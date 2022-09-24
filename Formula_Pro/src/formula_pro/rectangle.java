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
public class rectangle extends area implements math {

    public rectangle() {
    }

    @Override
    public double getArea() {
        
        return b*h;
    }
    
    
}
