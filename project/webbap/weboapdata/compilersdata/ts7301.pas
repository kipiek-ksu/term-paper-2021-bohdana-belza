Program tema2_2;
Var x,y,z,a,b,q,w:real;
Begin
Read(x,y,z);
q:=sqrt(abs(x-1))-sqrt(abs(y));
w:=1+x*x/2+y*y/4;
a:=q/w;
b:=x*(arctan(z)+exp(-(x+3)));
Write(a:10:3,b:10:3);
end.
