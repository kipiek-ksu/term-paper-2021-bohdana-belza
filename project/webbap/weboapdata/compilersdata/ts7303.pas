Program L_2_5;
Var x,y,z,a,b,c,c1,tg:real;
Begin
read(x,y,z);
c:=y+x*sqr(x)/3; if c<>0 then
c1:=sqr(y)+abs(sqr(x)/c) else
a:=0; if c1<>0 then
a:=y+x/c else a:=0;
tg:=sin(z/2)/cos(z/2);
b:=1+sqr(tg);
Write(a:6:3,' ',b:6:3);
End.