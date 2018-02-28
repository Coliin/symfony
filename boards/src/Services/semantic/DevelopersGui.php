<?php

namespace App\Services\semantic;


use Ajax\php\symfony\JquerySemantic;
use Ajax\semantic\html\elements\HtmlLabel;
use App\Entity\Developer;

class DevelopersGui extends JquerySemantic
{
    public function dataTable($devs){
        $dt=$this->_semantic->dataTable("dtDevelopers", "App\Entity\Tag", $devs);
        $dt->setIdentifierFunction(function ($index,$dev){
            return $dev->getId();
        });
        $dt->setFields(["Developers"]);
        $dt->setCaptions(["Developers"]);
        $dt->setValueFunction("developer", function($v,$dev){
            $lbl=new HtmlLabel("",$dev->getIdentity());
            return $lbl;
        });
        $dt->addEditButton();
        $dt->addDeleteButton();
        $dt->setUrls(["edit"=>"developers/update"]);
        $dt->setTargetSelector("#update-developer");
        return $dt;
    }

    public function frm(Developer $developer){
        $frm=$this->_semantic->dataForm("frm-developer", $developer);
        $frm->setFields(["id","identity","submit","cancel"]);
        $frm->setCaptions(["","Identity","Valider","Annuler"]);
        $frm->fieldAsHidden("id");
        $frm->fieldAsInput("identity",["rules"=>["empty","maxLength[30]"]]);
        $frm->setValidationParams(["on"=>"blur","inline"=>true]);
        $frm->onSuccess("$('#frm-developer').hide();");
        $frm->fieldAsSubmit("submit","positive","developers/submit", "#dtDevelopers",["ajax"=>["attr"=>"","jqueryDone"=>"replaceWith"]]);
        $frm->fieldAsLink("cancel",["class"=>"ui button cancel"]);
        $this->click(".cancel","$('#frm-developer').hide();");
        $frm->addSeparatorAfter("identity");
        return $frm;
    }
}