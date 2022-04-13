var a1,b,r1,e,d:word;
    a,r2:integer;
begin
read(a);
a1:=a div 10000;
b:=a div 1000 mod 10;
r1:=a div 100 mod 10;
d:=a div 10 mod 10;
e:=a mod 10;
r2:=a1+b+d+e;
write(r1,r2);
end.