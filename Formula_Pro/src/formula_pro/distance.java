/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
package formula_pro;

public class distance extends motion implements physics{

    public distance() {
    }
    
    @Override
    public double getresult() {
       return (u*t)+(.5*a*t*t);
    }
    
}
