program viraz6;
var x,y,z:real;
    a,b:real;
begin
     readln(x,y,z);
     a:=(2*cos(x-pi/6))/(1/2+sqr(sin(y)));
     b:=1+(sqr(z))/(3+sqr(z)/5);
     writeln(a:0:3,,b:0:3);
end.