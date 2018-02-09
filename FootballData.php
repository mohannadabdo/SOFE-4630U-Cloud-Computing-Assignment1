<?php
include './models/Soccerseason.php';
include './models/Team.php';

class FootballData {
    
    public $config;
    public $baseUri;
    public $reqPrefs = array();
        
    public function __construct() {
        $this->config = parse_ini_file('config.ini', true);
        
        $this->baseUri = $this->config['baseUri']; 
        
        $this->reqPrefs['http']['method'] = 'GET';
        $this->reqPrefs['http']['header'] = 'X-Auth-Token: ' . $this->config['authToken'];
    }
    
    /**
     * Function returns a specific soccer season identified by an id.
     * 
     * @param Integer $id
     * @return \Soccerseason object
     */        
    public function getSoccerseasonById($id) {
        $resource = 'soccerseasons/' . $id;
        $response = file_get_contents($this->baseUri . $resource, false, 
                                      stream_context_create($this->reqPrefs));
        $result = json_decode($response);
        
        return new Soccerseason($result);
    }
    
    /**
     * Function returns all available fixtures for a given date range.
     * 
     * @param DateString 'Y-m-d' $start
     * @param DateString 'Y-m-d' $end
     * @return array of fixture objects
     */    
    public function getFixturesForDateRange($start, $end) {
        $resource = 'fixtures/?timeFrameStart=' . $start . '&timeFrameEnd=' . $end;
        $response = file_get_contents($this->baseUri . $resource, false, 
                                      stream_context_create($this->reqPrefs));
        
        return json_decode($response);
    }
    
    /**
     * Function returns one unique fixture identified by a given id.
     * 
     * @param int $id
     * @return stdObject fixture
     */
    public function getFixtureById($id) {
        $resource = 'fixtures/' . $id;
        $response = file_get_contents($this->baseUri . $resource, false, 
                                      stream_context_create($this->reqPrefs));
        
        return json_decode($response);
    }
    
    /**
     * Function returns one unique team identified by a given id.
     * 
     * @param int $id
     * @return stdObject team
     */    
    public function getTeamById($id) {
        $resource = 'teams/' . $id;
        $response = file_get_contents($this->baseUri . $resource, false, 
                                      stream_context_create($this->reqPrefs));
        
        $result = json_decode($response);
        
        return new Team($result);
    }
    
    /**
     * Function returns all teams matching a given keyword.
     * 
     * @param string $keyword
     * @return list of team objects
     */    
    public function searchTeam($keyword) {
        $resource = 'teams/?name=' . $keyword;
        $response = file_get_contents($this->baseUri . $resource, false, 
                                      stream_context_create($this->reqPrefs));
        
        return json_decode($response);
    }    
}