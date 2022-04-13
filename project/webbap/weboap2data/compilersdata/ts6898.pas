program A1;
Var a,b,x,y,z: real;
begin
read (x);
read (y);
read(z);
a:=(3 + exp(y-1))/(1+sqr(x)*abs(y-(sin(z)/cos(z))));
b:=1+abs(y-x)+(sqr(y-x)/2) + (sqr(y-3)*(y-3)/3);
write(a:10:2,'   ',b:10:2);
end.