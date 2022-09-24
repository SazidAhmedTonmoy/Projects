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
public class gforce extends gravity implements physics {

    public gforce() {
    }

    @Override
    public double getresult() {
       return (G*m1*m2)/d*d;
    }
 
    
}
