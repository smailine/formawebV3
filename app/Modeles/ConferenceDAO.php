<?php

namespace App\Modeles;
use DB;
use Illuminate\Database\Eloquent\Model;
use App\Metier\Conference;

class ConferenceDAO extends Model
{
    //Return all conferences stored in database

    public function getLesConferences()
    {
        $conferences = DB::table('Conference')->get();
        $lesConferences = array();
        foreach ($conferences as $laConference) {
            $idConf = $laConference->idConf;
            $lesConferences[$idConf] = $this->creerConference($laConference);
        }
        return $lesConferences;
    }

    private function creerConference(\stdClass $uneConference)
    {
        $laConference = new Conference();
        $laConference->setIdConf($uneConference->idConf);
        $laConference->setIntituleConf($uneConference->intituleConf);
        $laConference->setDescriptionConf($uneConference->descriptionConf);
        return $laConference;
    }
}