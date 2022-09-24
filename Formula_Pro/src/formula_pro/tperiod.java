/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
package formula_pro;

/**
 *
 * @author Sajadul Islam
 */
public class tperiod extends gravity implements physics{

    public tperiod() {
    }
    
    

    @Override
    public double getresult() {
       return 2*pi*Math.sqrt(d/g);
    }
    
}
