program l4z23;
var z,p:real;
Begin
     readln(z);
     if (z<=17) then p:=0
     else if (z>=85) then p:=0.15*(z-85)+6.8
     else p:=0.1*z;
     writeln(p:0:2);
End.