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
public class relativisticm extends modernp implements physics {

    public relativisticm() {
    }
    
    @Override
    public double getresult() {
        return m/(Math.sqrt(1-(Math.pow(v, 2)/Math.pow(c, 2))));
    }
    
    
}
