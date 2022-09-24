/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
package formula_pro;


public class cylinder extends volume implements math{

    public cylinder() {
    }

    @Override
    public double getVolume() {
        return pi*r*r*h;
    }
    
    
    
}
