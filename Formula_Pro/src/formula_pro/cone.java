/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
package formula_pro;

/**
 *
 * @author sanzi
 */
public class cone extends volume implements math{

    public cone() {
    }

    @Override
    public double getVolume() {
        return (1/3.0)*pi*r*r*h;
    }
    
    
}
