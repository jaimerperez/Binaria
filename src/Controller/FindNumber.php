<?php
// src/Controller/LuckyController.php
namespace App\Controller;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;

class FindNumber extends AbstractController
{
    public function number(): Response
    {       
            $INIT = 1;
            $END = 100000;
            if(isset($_POST["numberChoosen"]))
            {
            $media = 0;
            $number = intval($_POST["numberChoosen"]);
            $this->findNumber($INIT, $END, $number, $media);
            return $this->render('/number.html.twig', [
                'media' => $media,
                ]); 
            }
            return $this->render('/number.html.twig', [
                ]); 
    }

    private function findNumber(int $init, int $end, int $number, int &$media)
    {
            $media = round(($end + $init)/2);

            if($number == $media)  
                return $media;  

            else if ($number == $media-1)
            {
                $media--;
                return $media; 
            }
            else if($number < $media)
                $this->findNumber($init, $media, $number,$media);
                        
            else if($number > $media)
                $this->findNumber($media, $end, $number,$media);
            
    }
}