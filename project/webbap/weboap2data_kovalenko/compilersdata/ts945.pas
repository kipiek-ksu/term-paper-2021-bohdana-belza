program z_47;
var r,a,n,b:real;d1,d2:integer;
begin
read(a,n,b);
 r:=sqr(n)+(4*n*a*60)/b;
 if r>0 then begin
 d1:=(n+sqrt(r))/2;d2:=d1-n;
 write(d1,' ',d2);end
 else if r=0 then begin d1:=n/2;d2:=d1-n;write(d1,' ',d2);end
 else write('nepravilni dani');
 end.
