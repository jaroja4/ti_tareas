<?php



namespace Kanboard\Plugin\SendEmailCreator;



use Kanboard\Core\Plugin\Base;
use Kanboard\Plugin\SendEmailCreator\Action\SendTaskAssignee;
use Kanboard\Plugin\SendEmailCreator\Action\SendTaskCreator;
use Kanboard\Plugin\SendEmailCreator\Action\TaskEmailDue;



class Plugin extends Base

{
    
	public function initialize()
    
	{
        
		$this->actionManager->register(new SendTaskCreator($this->container));
    	        $this->actionManager->register(new SendTaskAssignee($this->container));
		$this->actionManager->register(new TaskEmailDue($this->container));
	}

	
	public function getPluginName()	
	{ 		 
		return 'Auto Email Action Extender'; 
	}

	public function getPluginAuthor() 
	{ 	 
		return 'Craig Crosby'; 
	}

	public function getPluginVersion() 
	{ 	 
		return '0.0.2'; 
	}

	public function getPluginDescription() 
	{ 
		return 'Add the automatic actions to Send a task by email to the creator or assignee of the task. Also, included is an action to send a notification via email to user, creator, and assignee when a due date is impending within a duration.'; 
	}

	public function getPluginHomepage() 
	{ 	 
		return 'https://github.com/creecros/SendTaskCreator'; 
	}
}
