
package formula_pro;


public abstract class motion {
    
    double a,u,v,t,s;

    public motion() {
    }

    public motion(double a, double u, double v, double t, double s) {
        this.a = a;
        this.u = u;
        this.v = v;
        this.t = t;
        this.s = s;
    }

    public double getA() {
        return a;
    }

    public void setA(double a) {
        this.a = a;
    }

    public double getU() {
        return u;
    }

    public void setU(double u) {
        this.u = u;
    }

    public double getV() {
        return v;
    }

    public void setV(double v) {
        this.v = v;
    }

    public double getT() {
        return t;
    }

    public void setT(double t) {
        this.t = t;
    }

    public double getS() {
        return s;
    }

    public void setS(double s) {
        this.s = s;
    }
    
    /**
     *
     * @return
     */
    public abstract double getresult();
    
    
}
