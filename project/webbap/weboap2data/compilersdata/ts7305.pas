Program z1;
Var a,r,b,c,d,e,g,h:integer;
Begin
Read(a);
b:=a div 1000;
c:=a mod 1000;
d:=c div 100;
e:=c mod 100;
g:=e div  10;
h:=e mod 10;
r:=b*d*g*h;
Write(r);
end.
