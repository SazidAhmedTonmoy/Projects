/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
package formula_pro;

public class velocity extends motion implements physics{

    public velocity() {
    }
    
    @Override
    public double getresult() {
        return u+a*t;

    }
    
}
