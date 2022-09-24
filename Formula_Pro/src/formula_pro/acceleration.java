
package formula_pro;


public class acceleration extends motion implements physics {

    public acceleration() {
    }
    
    @Override
    public double getresult() {
        return (v-u)/t;
    }
    
}
