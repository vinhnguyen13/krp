<?
class Message extends YumMessage
{
    public static function model($className=__CLASS__) {
        return parent::model($className);
    }
    
    public function relations()
    {
        return array(
                'from_user' => array(self::BELONGS_TO, 'Member', 'from_user_id'),
                'to_user' => array(self::BELONGS_TO, 'Member', 'to_user_id'),
        );
    }
    
    public function getAnswers(){
        if(!empty($this->id)){
            $criteria = new CDbCriteria();
            $criteria->addCondition("answered = :answered");
            $criteria->params = array(':answered'=>$this->id);
            $answers = $this->findAll($criteria); 
            if($answers){
                return $answers;
            }
        }   
        return false;    
    }

}
