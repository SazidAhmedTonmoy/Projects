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
public class timed extends modernp implements physics{

    public timed() {
    }

    
    @Override
    public double getresult() {
        return t/(Math.sqrt(1-((v*v)/(c*c))));
    }
    
}
