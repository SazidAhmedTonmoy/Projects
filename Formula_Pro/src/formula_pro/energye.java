/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
package formula_pro;


public class energye extends electricityp implements physics {

    public energye() {
    }

    
    @Override
    public double getresult() {
        return V*I*t;
    }
    
}
