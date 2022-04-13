program z;
var a,r,b,c,d,e:integer;
begin
 read(a);
 b:=a div 1000;
 c:=a div 100 mod 10;
 d:=a div 10 mod 10;
 e:=a mod 10;
 r:=b+c+d+e;
 write(r);
end. 