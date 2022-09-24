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
public class potential extends work implements physics {

    public potential() {
    }

    @Override
    public double getresult() {
        
        return m*g*h;
    }
    
    
}
