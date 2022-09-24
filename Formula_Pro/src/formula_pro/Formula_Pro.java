
package formula_pro;
import java.util.*;
import java.io.*;



public class Formula_Pro {

    public static void main(String[] args) throws Exception {
        
        double result;
        
        System.out.print("Enter The File Name: ");
        Scanner input = new Scanner(System.in);
        String fname= input.next();
        File file = new File(fname);
        try (PrintWriter output = new PrintWriter(file)) {
            System.out.println("\n**************************************************************************");
            System.out.println("\n**************************************************************************");
            System.out.println("\n**************************WELCOME TO FORMULA PRO**************************");
            System.out.println("\n**************************************************************************");
            System.out.println("\n**************************************************************************");
            
            output.print("Welcome To Formula Pro!!!\n");
            char slct;
            int f=1;
            
            do{
            output.print("("+f+")");
            int number;
            System.out.println("Choose your option:\n1.Physics\n2.Mathematics\n3.Theories & Formula\n\nYour choice:");
            number = input.nextInt();
            
            switch (number)
            {
                case 1:
                {
                    System.out.println("\nChoose your option:\n1.Motion\n2.Work\n3.Gravity\n4.Morden Physics\n5.Electricity\n\nYour choice:");
                    number = input.nextInt();
                    
                    switch (number)
                    {
                        case 1:
                        {
                            System.out.println("\n1.Find Velocity\n2.Find Acceleration\n3.Find Distance\n\nYour Choice: ");
                            number = input.nextInt();
                            switch (number)
                            {
                                case 1:
                                {
                                    velocity velo = new velocity();
                                    
                                    System.out.println("\nEnter previous velocity: ");
                                    velo.u = input.nextDouble();
                                    output.print("\nThe previous velocity: " +velo.u);
                                    
                                    System.out.println("\nEnter acceleration: ");
                                    velo.a = input.nextDouble();
                                    output.print("\nThe acceleration: " +velo.a);
                                    
                                    System.out.println("\nEnter time: ");
                                    velo.t = input.nextDouble();
                                    output.print("\nThe time: " +velo.t);
                                    
                                    result= velo.getresult();
                                    output.print("\nThe velocity is " +result+"m/s");
                                    System.out.println("\nThe velocity is "+result+"m/s");
                                    break;
                                    
                                }
                                case 2:
                                {
                                    acceleration acc = new acceleration();
                                    
                                    System.out.println("\nEnter velocity: ");
                                    acc.v = input.nextDouble();
                                    output.print("\nThe velocity: " +acc.u);
         
                                    System.out.println("\nEnter previous velocity: ");
                                    acc.u = input.nextDouble();
                                    output.print("\nThe previous velocity: " +acc.u);
                                    
                                    System.out.println("\nEnter time: ");
                                    acc.t = input.nextDouble();
                                    output.print("\nThe time: " +acc.t);
                                    
                                    result= acc.getresult();
                                    output.print("\nThe Acceleration is " +result+"m/s^2");
                                    System.out.println("\nThe Acceleration is "+result+"m/s^2");
                                    break;
                                    
                                }
                                case 3:
                                {
                                    distance dis = new distance();
                                    System.out.println("\nEnter previous velocity: ");
                                    dis.u = input.nextDouble();
                                    output.print("\nThe previous velocity: " +dis.u);
                                    
                                    System.out.println("\nEnter acceleration: ");
                                    dis.a = input.nextDouble();
                                    output.print("\nThe acceleration: " +dis.a);
                                    
                                    System.out.println("\nEnter time: ");
                                    dis.t = input.nextDouble();
                                    output.print("\nThe time: " +dis.t);
                                    
                                    result= dis.getresult();
                                    output.print("\nThe Distance is " +result+"m");
                                    System.out.println("\nThe Distance is "+result+"m");
                                    break;
                                    
                                    
                                }
                                default:
                                {
                                    System.out.println("Error Option!! Try again\n\n");
                                }
                            }
                            break;
                        }
                        case 2:
                        {
                            System.out.println("\n1.Find Force\n2.Find Work\n3.Find Potential Energy\n4.Kinetic Energy\n\nYour Choice: ");
                            number = input.nextInt();
                            switch(number)
                            {
                                case 1:
                                {
                                    force fo = new force();
                                    System.out.println("\nEnter the mass: ");
                                    fo.m = input.nextDouble();
                                    output.print("\nThe mass : "+fo.m);
                                    
                                    System.out.println("\nEnter the acceleration: ");
                                    fo.a = input.nextDouble();
                                    output.print("\nThe acceleration : "+fo.a);
                                    
                                    result = fo.getresult();
                                    System.out.println("\nThe force is "+result+"N");
                                    output.print("\nThe force is "+result+"N");
            
                                    break; 
                                }
                                case 2:
                                {
                                    works wo = new works();
                                    System.out.println("\nEnter the force: ");
                                    wo.f = input.nextDouble();
                                    output.print("\nThe force : "+wo.f);
                                    
                                    System.out.println("\nEnter the distance: ");
                                    wo.s = input.nextDouble();
                                    output.print("\nThe distance : "+wo.s);
                                    
                                    result = wo.getresult();
                                    System.out.println("\nThe work is "+result+"J");
                                    output.print("\nThe work is "+result+"J");
                                    
                                    break;
                                }
                                case 3:
                                {
                                    potential po = new potential();
                                    System.out.println("\nEnter the mass: ");
                                    po.m = input.nextDouble();
                                    output.print("\nThe mass : "+po.m);
                                    
                                    System.out.println("\nEnter the height: ");
                                    po.h = input.nextDouble();
                                    output.print("\nThe distance : "+po.h);
                                    
                                    result = po.getresult();
                                    System.out.println("\nThe potential energy is "+result+"J");
                                    output.print("\nThe potential energy is "+result+"J");
                                    break;
                                }
                                case 4:
                                {
                                    kinetic ki = new kinetic();
                                    System.out.println("\nEnter the mass: ");
                                    ki.m = input.nextDouble();
                                    output.print("\nThe mass : "+ki.m);
                                    
                                    System.out.println("\nEnter the velocity: ");
                                    ki.v = input.nextDouble();
                                    output.print("\nThe velocity : "+ki.v);
                                    
                                    result = ki.getresult();
                                    System.out.println("\nThe kinetic energy is "+result+"J");
                                    output.print("\nThe kinetic energy is "+result+"J");
                                    break;
                                }
                                default:
                                {
                                    System.out.println("Error Option!! Try again\n\n");
                                }
                            }
                            break;
                        }
                        case 3:
                        {
                            System.out.println("\n1.Find Force\n2.Find Escape Velocity\n3.Find Time Period\n\nYour Choice: ");
                            number = input.nextInt();
                            switch(number)
                            {
                                case 1:
                                {
                                    gforce fo = new gforce();
                                    
                                    System.out.println("\nEnter 1st mass: ");
                                    fo.m1= input.nextDouble();
                                    output.print("\nThe 1st Mass: "+fo.m1);
                                    
                                    System.out.println("\nEnter 2nd mass: ");
                                    fo.m2= input.nextDouble();
                                    output.print("\nThe 2nd Mass: "+fo.m2);
                                    
                                    System.out.println("\nEnter Distance: ");
                                    fo.d= input.nextDouble();
                                    output.print("\nThe Distance: "+fo.d);
                                    
                                    result = fo.getresult();
                                    System.out.println("\nThe Force is "+result+"N");
                                    output.print("\nThe Force is "+result+"N");
                                    break;
                                }
                                case 2:
                                {
                                    evelocity ev = new evelocity();
                                    
                                    System.out.println("\nEnter mass in kg(planet): ");
                                    ev.m1= input.nextDouble();
                                    output.print("\nThe  Mass in kg(Planet): "+ev.m1);
                                    
                                    System.out.println("\nEnter Radius in meter(planet): ");
                                    ev.R= input.nextDouble();
                                    output.print("\nThe Radius in meter(planet): "+ev.R);
                                    
                                    result = ev.getresult();
                                    System.out.println("\nThe Escape Velocity is "+result+"m/s");
                                    output.print("\nThe Escape Velocity is "+result+"m/s");
                                    break;
                                }
                                case 3:
                                {
                                    tperiod tp = new tperiod();
                                    
                                    System.out.println("\nEnter Length of string: ");
                                    tp.d= input.nextDouble();
                                    output.print("\nThe Length of string: "+tp.d);
                                    
                                    result = tp.getresult();
                                    System.out.println("\nThe Time period is "+result+"s");
                                    output.print("\nThe Time period is "+result+"s");
                                    break;
                                }
                                default:
                                {
                                    System.out.println("Error Option!! Try again\n\n"); 
                                }
                            }
                            break;
                        }
                        case 4:
                        {
                            System.out.println("\n1.Find Time Dilation\n2.Find Length Contraction\n3.Find Relativistic Mass \n\nYour Choice: ");
                            number = input.nextInt();
                            switch(number){
                                case 1:
                                {
                                    timed td = new timed();
                                    System.out.println("\nEnter Time taken in Earth: ");
                                    td.t= input.nextDouble();
                                    output.print("\nTime taken in Earth: "+td.t);
                                    
                                    System.out.println("\nEnter The Velocity: ");
                                    td.v= input.nextDouble();
                                    output.print("\nThe Velocity: "+td.v);
                                    
                                    result = td.getresult();
                                    System.out.println("\nThe Time Dilation is  "+result+"s");
                                    output.print("\nThe Time Dilation is "+result+"s");
                                    
                                  break;  
                                }
                                case 2:
                                {
                                    lengthc lc = new lengthc();
                                    System.out.println("\nEnter length in Earth: ");
                                    lc.l= input.nextDouble();
                                    output.print("\nLength in Earth: "+lc.l);
                                    
                                    System.out.println("\nEnter The Velocity: ");
                                    lc.v= input.nextDouble();
                                    output.print("\nThe Velocity: "+lc.v);
                                    
                                    result = lc.getresult();
                                    System.out.println("\nThe Length Contraction is  "+result+"m");
                                    output.print("\nThe Contraction is "+result+"m");
                                  break;  
                                }
                                case 3:
                                {
                                    relativisticm rm = new relativisticm();
                                    System.out.println("\nEnter The Mass in Earth: ");
                                    rm.m= input.nextDouble();
                                    output.print("\nMass in Earth: "+rm.m);
                                    
                                    System.out.println("\nEnter The Velocity: ");
                                    rm.v= input.nextDouble();
                                    output.print("\nThe Velocity: "+rm.v);
                                    
                                    result = rm.getresult();
                                    System.out.println("\nThe Relativistic Mass is  "+result+"kg");
                                    output.print("\nThe Relativistic Mass is  "+result+"kg");
                                  break;  
                                }
                                default:
                                {
                                    System.out.println("Error Option!! Try again\n\n"); 
                                }
                                    
                                    
                            }
                            
                            break;
                        }
                        case 5:
                        {
                             System.out.println("\n1.Find Charge\n2.Find Energy\n3.Find Power\n\nYour Choice: ");
                            number = input.nextInt();
                            switch(number){
                                case 1:{
                                    chargee ce=new chargee();
                                    System.out.println("\nEnter The Current: ");
                                    ce.I= input.nextDouble();
                                    output.print("\nCurrent: "+ce.I);
                                    
                                    System.out.println("\nEnter The time in seconds: ");
                                    ce.t= input.nextDouble();
                                    output.print("\nTime in seconds: "+ce.t);
                                    
                                    result = ce.getresult();
                                    System.out.println("\nThe Charge is  "+result+"C");
                                    output.print("\nThe Charge is "+result+"C");
                                    break;
                                } 
                                case 2:{
                                    energye ee= new energye();
                                    System.out.println("\nEnter The Voltage in volts: ");
                                    ee.V= input.nextDouble();
                                    output.print("\nVoltatge in volts: "+ee.V);
                                    
                                    System.out.println("\nEnter The time in seconds: ");
                                    ee.t= input.nextDouble();
                                    output.print("\nTime in seconds: "+ee.t);
                                    
                                    System.out.println("\nEnter The Current: ");
                                    ee.I= input.nextDouble();
                                    output.print("\nCurrent in C "+ee.I);
                                    
                                     result = ee.getresult();
                                    System.out.println("\nThe Energy is  "+result+"j");
                                    output.print("\nThe Energy is "+result+"j");
                                    break;
                                }
                                case 3:{
                                    powere pe= new powere();
                                    System.out.println("\nEnter The Voltage in volts: ");
                                    pe.V= input.nextDouble();
                                    output.print("\nVoltatge in volts: "+pe.V);
                                    
                                    System.out.println("\nEnter The Resistance in ohm: ");
                                    pe.Re= input.nextDouble();
                                    output.print("\nResistance in ohm: "+pe.Re);
                                    
                                    result = pe.getresult();
                                    System.out.println("\nThe power is  "+result+"watt");
                                    output.print("\nThe power is "+result+"watt");
                                    
                                    break;
                                }
                                default:
                                {
                                    System.out.println("Error Option!! Try again\n\n"); 
                                }
                            }
                            
                            break;
                        }
                        default:
                        {
                             System.out.println("Error Option!! Try again\n\n");
                        }
                    }
                    break;
                     
                }
                    
                case 2:
                {
                    System.out.println("\nChoose your option:\n1.Area\n2.Volume\n\nYour choice: ");
                    number = input.nextInt();
                    switch(number)
                    {
                        case 1:
                        {
                            System.out.println("\n1.Circle\n2.Triangle\n3.Rectangle\n4.trapzoid\n\nYour Choice: ");
                            number = input.nextInt();
                            switch(number)
                            {
                                case 1:
                                {
                                    circle c = new circle();
                                    System.out.println("\nEnter the Radius: ");
                                    c.r = input.nextDouble();
                                    output.print("\nThe radius : "+c.r);
                                    
                                    result = c.getArea();
                                    System.out.println("\nThe  area of circle is "+result+" unit^2");
                                    output.print("\nThe area of circle is "+result+"unit^2");
                                    break;
                                }
                                case 2:
                                {
                                    triangle t = new triangle();
                                    System.out.println("\nEnter the base: ");
                                    t.b = input.nextDouble();
                                    output.print("\nThe height : "+t.b);
                                    
                                    System.out.println("\nEnter the height: ");
                                    t.h = input.nextDouble();
                                    output.print("\nThe height : "+t.h);
                                    
                                    result = t.getArea();
                                    System.out.println("\nThe  area of triangle is "+result+" unit^2");
                                    output.print("\nThe area of triangle is "+result+"unit^2");
                                    break;
                                }
                                case 3:
                                {
                                    rectangle r = new rectangle();
                                    System.out.println("\nEnter the base: ");
                                    r.b = input.nextDouble();
                                    output.print("\nThe height : "+r.b);
                                    
                                    System.out.println("\nEnter the height: ");
                                    r.h = input.nextDouble();
                                    output.print("\nThe height : "+r.h);
                                    
                                    result = r.getArea();
                                    System.out.println("\nThe  area of rectangle is "+result+" unit^2");
                                    output.print("\nThe area of rectangle is "+result+"unit^2");
                                    break;
                                }
                                case 4:
                                {
                                    trapzoid tr = new trapzoid();
                                    System.out.println("\nEnter the 1st base: ");
                                    tr.a = input.nextDouble();
                                    output.print("\nThe height : "+tr.a);
                                    
                                    System.out.println("\nEnter the 2nd base: ");
                                    tr.b = input.nextDouble();
                                    output.print("\nThe height : "+tr.b);
                                    
                                    System.out.println("\nEnter the height: ");
                                    tr.h = input.nextDouble();
                                    output.print("\nThe height : "+tr.h);
                                    
                                    result = tr.getArea();
                                    System.out.println("\nThe  area of trapzoid is "+result+" unit^2");
                                    output.print("\nThe area of trapzoid is "+result+"unit^2");
                                    break;
                                }
                                default:
                                {
                                    System.out.println("Error Option!! Try again\n\n"); 
                                }
                            }
                                    
                            break;
                        }
                        case 2:
                        {
                            System.out.println("\n1.Sphere\n2.Cone\n3.Cuboid\n4.Cylinder\n\nYour Choice: ");
                            number = input.nextInt();
                            switch(number)
                            {
                                case 1:
                                {
                                    sphere s= new sphere();
                                    System.out.println("\nEnter the Radius: ");
                                    s.r = input.nextDouble();
                                    output.print("\nThe radius : "+s.r);
                                    
                                    result = s.getVolume();
                                    System.out.println("\nThe  volume of sphere is "+result+" unit^3");
                                    output.print("\nThe volume of sphere is "+result+"unit^3");
                                    break;
                                }
                                case 2:
                                {
                                    cone c = new cone();
                                    System.out.println("\nEnter the Radius: ");
                                    c.r = input.nextDouble();
                                    output.print("\nThe radius : "+c.r);
                                    
                                    System.out.println("\nEnter the height: ");
                                    c.h = input.nextDouble();
                                    output.print("\nThe height : "+c.h);
                                    
                                    result = c.getVolume();
                                    System.out.println("\nThe  volume of cone is "+result+" unit^3");
                                    output.print("\nThe volume of cone is "+result+"unit^3");
                                    break;
                                }
                                case 3:
                                {
                                    cuboid cu = new cuboid();
                                    
                                    System.out.println("\nEnter the height: ");
                                    cu.h = input.nextDouble();
                                    output.print("\nThe height : "+cu.h);
                                    
                                    System.out.println("\nEnter the lenght: ");
                                    cu.l = input.nextDouble();
                                    output.print("\nThe lenght : "+cu.l);
                                    
                                    System.out.println("\nEnter the width: ");
                                    cu.w = input.nextDouble();
                                    output.print("\nThe width : "+cu.w);
                                    
                                    result = cu.getVolume();
                                    System.out.println("\nThe  volume of cuboid is "+result+" unit^3");
                                    output.print("\nThe volume of cuboid is "+result+"unit^3");
                                    
                                    break;
                                }
                                case 4:
                                {
                                    cylinder cy = new cylinder();
                                    System.out.println("\nEnter the Radius: ");
                                    cy.r = input.nextDouble();
                                    output.print("\nThe radius : "+cy.r);
                                    
                                    System.out.println("\nEnter the height: ");
                                    cy.h = input.nextDouble();
                                    output.print("\nThe height : "+cy.h);
                                    
                                    result = cy.getVolume();
                                    System.out.println("\nThe  volume of cylinder is "+result+" unit^3");
                                    output.print("\nThe volume of cylinder is "+result+"unit^3");
                                    break;
                                }
                                default:
                                {
                                   System.out.println("Error Option!! Try again\n\n"); 
                                }
                            }
                            
                            break;
                        }
                        default:
                        {
                            System.out.println("Error Option!! Try again\n\n");
                        }
                    }
                    
                    break;
                }
                
                case 3:
                {
                    System.out.println("\nChoose your option:\n1.Formula\n2.Theory\n\nYour Choice: ");
                    number = input.nextInt();
                    switch(number)
                    {
                        case 1:
                        {
                            File file2 = new File("formula.txt");
                            Scanner scan = new Scanner(file2);
                            
                            while(scan.hasNextLine())
                            {
                                System.out.println(scan.nextLine());
                            }
                            
                            break;
                        }
                        case 2:
                        {
                            //Scanner read = new Scanner(System.in);
                            FileReader file3 = new FileReader("theories.txt");
                            BufferedReader reader = new BufferedReader(file3);
                            
                            String text= "";
                            String line= reader.readLine();
                            while(line != null)
                            {
                                text += line;
                                System.out.println(text);
                                text= "";
                                line = reader.readLine();
                            }

                            break;
                        }
                        default:
                        {
                            System.out.println("Error Option!! Try again\n\n");
                        }
                    }
                    break;
                }
                default:
                {
                    System.out.println("Error Option!! Try again\n\n");
                } 
                    
            }
            
             System.out.println("\nDo want to continue?? Y for yes and other for no");
             output.print("\n\n");
             
             slct= input.next().charAt(0);
             f++;
            }while(slct=='y'||slct=='Y');
            System.out.println("\n\n\n***Made by Sazid***");
            output.print("\n\n\n***Made by Sazid***");
        }
    }
    
}
