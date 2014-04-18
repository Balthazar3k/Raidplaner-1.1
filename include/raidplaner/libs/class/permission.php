<?php
class Permission {
    
    protected $raidplaner;
    
    protected $create;
    protected $update;
    protected $delete;
    
    public function __construct($object) {
        $this->raidplaner = $object;
        
        /* Permissions for Creating */
        $this->create = array(
            'times' => array(
                'permission' => ( $_SESSION['charrang'] >= 13 || is_admin() ), 
                'message' => 'Sie haben nicht die n&ouml;tigen Rechte um die Zeiten zu bearbeiten!'
            )
        );
        
        /* Permissions for Updateing */
        $this->update = array(
            'charakter' => array(
                'permission' => ( $_SESSION['charrang'] >= 13 || is_admin() ), 
                'message' => 'Sie haben nicht die n&ouml;tigen Rechte!'
            )
        );
        
        /* Permissions for Deleting */
        $this->delete = array(
            'charakter' => array(
                'permission' => ( $_SESSION['charrang'] >= 13 || is_admin() ), 
                'message' => 'Sie haben nicht die n&ouml;tigen Rechte!'
            ),
            'times' => array(
                'permission' => ( $_SESSION['charrang'] >= 13 || is_admin() ), 
                'message' => 'Sie haben nicht die n&ouml;tigen Rechte um die Zeiten zu L&ouml;schen!'
            )
        );
        
        return $this;
    }
    
    public function create($key, &$message = NULL) {
        $message = $this->create[$key]['message'];
        return $this->create[$key]['permission'];
    }
    
    public function update($key, &$message = NULL) {
        $message = $this->update[$key]['message'];
        return $this->update[$key]['permission'];
    }

    public function delete($key, &$message = NULL) {
        $message = $this->delete[$key]['message'];
        return $this->delete[$key]['permission'];
    }
    
}
?>