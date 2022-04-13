 var A,R1,R2,k,m,n:integer;
begin
 read(A);
 k:=A div 100;
 m:=A div 10 mod 10;
 n:=A mod 10;
 R1:=m;
 R2:=k+n;
write(R1,,R2);
end.