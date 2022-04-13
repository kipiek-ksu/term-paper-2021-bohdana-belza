program L_2_46;
var a,b,c,t1,t2,t3,x1:real;
begin
     readln(a,b,c);
x1:=1/(2*a)+1/(2*b)-1/(2*c);
t1:=1/(x1);
t2:=1/(1/a-x1);
t3:=1/(1/b-x1);
     writeln(t1:0:3,' ',t2:0:3,' ',t3:0:3);
end.

