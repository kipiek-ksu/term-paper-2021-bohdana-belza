program z_68;
 var A,B,c,d,e,f:integer;
begin
 read(A);
 c:=A div 1000;
 d:=A div 100 mod 10;
 e:=A div 10 mod 10;
 f:=A mod 10;
 B:=e*1000+d*100+c*10+f;
write(B);
end.
