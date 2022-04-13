program cegla;
var a,b,c,x,y,f:longint;r:string;
begin
read(a);
read(b);
read(c);
read(x);
read(y);
f:=0;
if((x>b)and(y>c))or((x>c)and(y>b)) then f:=1;
if((x>b)and(y>a))or((x>a)and(y>b)) then f:=1;
if((x>a)and(y>c))or((x>c)and(y>a)) then f:=1;
if f=1
then r:='yes'; else r:='no';
write(r);
end.