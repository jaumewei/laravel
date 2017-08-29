<?php namespace App\Http\Helpers;

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Renderer
 *
 * @author informatica1
 */
abstract class Renderer {

    public static final function renderLink( $url, $label, $class, $id ){
        
    }
    /**
     * 
     * @param type $action
     * @param type $label
     * @param array $attributes
     * @return type
     */
    public static final function renderAction( $action, $label, array $attributes = [] ){
        
        if(is_null($attributes)){ $attributes = ['class'=>'button']; }
        
        $data = [sprintf('href="%s"',$action)];
        
        foreach( $attributes as $att => $val ){
            $data[] = sprintf('%s="%s"',$att,$val);
        }

        return sprintf('<a %s>%s</a>', implode(' ', $data), $label );
    }
}
