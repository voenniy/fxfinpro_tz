<?php

class SiteController extends Controller
{
    /**
	 * This is the default 'index' action that is invoked
	 * when an action is not explicitly requested by users.
	 */
	public function actionIndex()
	{
        $dependency = new CDbCacheDependency('SELECT max(updated_at) FROM quotes');

        $quotes = new CActiveDataProvider(Quotes::model()->cache(60*60*24*30, $dependency,2),[
            'pagination'=>[
                'pageSize' => 10,
            ]
        ]);
		$this->render('index', ["quotes"=>$quotes]);
	}

    public function actionUpdateq(){
        $raw = file_get_contents("http://finance.yahoo.com/webservice/v1/symbols/allcurrencies/quote?format=json");
        if($raw && ($json = json_decode($raw))){
            foreach($json->list->resources as $resource){
                $data = (array) $resource->resource->fields;
                $quotes = Quotes::model()->find("name=:name", [":name"=>$data['name']]);
                if(!$quotes){
                    $quotes = new Quotes();
                }
                $quotes->setAttributes($data);
                $quotes->save();
            }

        }
        Yii::app()->user->setFlash('info', "Данные обновлены!");
        $this->redirect("/");


    }
	
	public function actionError()
	{
		if($error=Yii::app()->errorHandler->error)
		{
			if(Yii::app()->request->isAjaxRequest)
				echo $error['message'];
			else
				$this->render('error', $error);
		}
	}


}