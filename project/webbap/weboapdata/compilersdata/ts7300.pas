Program L_2_3;
Var x,y,z,a,b:real;
Begin
Read(x,y,z);
a:=(3+Exp(y-1))/(1+sqr(x)*Abs(y-(sin(z)/cos(z))));
b:=1+Abs(y-x)+(sqr(y-x)/2)+((sqr(y-x)*(y-x))/3);
Write (a:6:2,' ',b:6:2);
end.