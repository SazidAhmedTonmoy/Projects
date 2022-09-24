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
public class lengthc extends modernp implements physics {

    public lengthc() {
    }

    @Override
    public double getresult() {
        return l*(Math.sqrt(1-((v*v)/(c*c))));
    }
    
    
}
