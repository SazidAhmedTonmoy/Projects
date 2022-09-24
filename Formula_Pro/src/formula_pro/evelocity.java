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
public class evelocity extends gravity implements physics{

    public evelocity() {
    }

    
    @Override
    public double getresult() {
       return Math.sqrt((2*G*m1)/R);
    }
    
}
