
package formula_pro;


public abstract class modernp {
    double t,v,l,m;
    final double c = 3*Math.pow(10,8);

    public modernp() {
    }

    public modernp(double t, double v, double l, double m) {
        this.t = t;
        this.v = v;
        this.l = l;
        this.m = m;
    }

    public double getT() {
        return t;
    }

    public void setT(double t) {
        this.t = t;
    }

    public double getV() {
        return v;
    }

    public void setV(double v) {
        this.v = v;
    }

    public double getL() {
        return l;
    }

    public void setL(double l) {
        this.l = l;
    }

    public double getM() {
        return m;
    }

    public void setM(double m) {
        this.m = m;
    }
    
    public abstract double getresult();
    
}
