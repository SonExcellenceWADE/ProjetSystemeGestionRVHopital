<?php
namespace Calendar;

use DateTime;

class Month{
    public $days=['Lundi', 'Mardi', 'Mercredi', 'Jeudi', 'Vendredi', 'Samedi', 'Dimanche'];
    private $months=['Janvier', 'Février', 'Mars', 'Avril', 'Mai', 'Juin', 'Juillet', 'Aout', 'Septembre', 
    'Octobre', 'Novembre', 'Décembre'];
    public  $month;
    public  $year;
    /**
     * Month contructor
     * @param int $month Le mois compris entre 1 et 12
     * @param int $year L'annee
     * @throws \Exception
     */
    public function __construct(int $month=null, int $year=null)
    {
        if ($month === null || $month < 1 || $month > 12 ) {
            $month = intval(date('m'));
        }
        if ($year === null) {
            $year = intval(date('Y'));
        }
       
       
       
       $this->month= $month;
       $this->year= $year;
    }
    /**
     * Retourne le mois en toute lettre Ex Mars 2018
     * @return string
     */
    public function toString(): string {
       return  $this->months[$this->month-1]. ' '.$this->year;
    }
    /**
     * Retourne le nombre de semaines dans le mois
     * @return int
     */

    public function getWeeks() {
        $start= $this->getStartingDay(); //Date de debut du Mois
      $end= (clone $start)->modify('+1 month -1 day '); // Date de Fin du Mois
      $weeks= intval($end->format('W')) - intval($start->format('W')) + 1 ;
      if($weeks < 0){
        $weeks= intval($end->format('W'));
      }
      return $weeks;
    }

    /**
     * Renvoi le 1er jour du mois
     * @return \DateTime
     */
    public function getStartingDay() :\DateTime{
        return  new \DateTime("{$this->year}-{$this->month}-01"); 
}
/**
 * Est ce que le jour est dans le mois en cours
 * @param \DateTime $date
 * @return bool
 */
public function withinMonth(\DateTime $date):bool{
     return $this->getStartingDay()->format('Y-m')=== $date->format('Y-m');
}
/**
 * Renvoi le mois suivant
 * @return Month
 */
public function nextMonth(): month{
$month=$this->month + 1;
$year= $this->year;
if($month >12){
    $month=1;
    $year+=1;
}
return new Month($month, $year);
}

/**
 * Renvoi le mois precedant
 * @return Month
 */
public function previousMonth(): month{
    $month=$this->month - 1;
    $year= $this->year;
    if($month < 1){
        $month=12;
        $year-=1;
    }
    return new Month($month, $year);
    }

}