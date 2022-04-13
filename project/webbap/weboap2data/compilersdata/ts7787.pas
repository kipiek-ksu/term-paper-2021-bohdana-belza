program ercoder;
 var a,b,c,d:word;
begin
 read(a);
 b:=a mod 10;
 a:=a div 10;
 c:=a mod 10;
 a:=a div 10;
 d:=(a mod 10)*10+(a div 10);
 c:=c*1000+d*10+b;
 write(c);
end.