<?php
/**
 * {{user_profile}}.
 * @author Serov Alexander <serov.sh@gmail.com>
 * @version
 * @package sewyii2
 * @since 1.0
 */

/**
 * Description of EventBehavior
 */
class EventBehavior extends CBehavior {
    public $events; //события родителя
    public $handlers; //все обработчики событий
    //put your code here
    public function attach($owner) {
        parent::attach( $owner );

        $this->getAllHandlers();
        foreach($this->events as $event) {
            foreach($this->handlers as $handler) {
                if($event==$handler['event'])
                    $this->getOwner()->$event->add($handler['handler']);
            }
        }


    }


    //Собираем все обработчики евентов со всех возможных компонентов\модулей
    public function getAllHandlers() {
        $this->handlers = Yii::app()->getModule('extlogin')->getHandlers();
        //надо сделать цикл по всем подключенным модулям
    }
}
?>
