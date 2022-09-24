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
public class kinetic extends work implements physics {

    public kinetic() {
    }
    
    
    @Override
    public double getresult() {
        
        return .5*m*v*v;
    }
    
    
}
