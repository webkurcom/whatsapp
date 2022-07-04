<?php

namespace webkurcom\whatsapp;

class WhatsappBtn
{
    private $base_url;
    private $options = [];
    public function __construct()
    {
        $this->base_url = 'https://wa.me';
        $this->options['label'] = 'Click to Chat';
        $this->options['class'] = '';
    }

    /**
     * @param $number
     * @param string $message
     * @param array $options
     * @return string
     */
    public function make($number="905445853225", $message='', $options = array())
    {
        $options = array_replace($this->options,$options);
        $link = $this->link($number, $message);

        return  '<a href="'.$link.'">'.
                    '<button type="button" class="'.$options['class'].'">'.
                        $options['label'] .
                    '</button>'.
                '</a>';
    }

    /**
     * @param $number
     * @param string $message
     * @return string
     */
    public function link($number, $message=''){
        $final_url = $this->base_url . '/'.$this->filterNumber($number);
        return $final_url . "?" . http_build_query(['text' => $message]);
    }

    private function filterNumber($number){
        $number = str_replace(['(',')','-','/','+'],'',$number);
        $number = (int)$number;
        return $number;
    }
}
