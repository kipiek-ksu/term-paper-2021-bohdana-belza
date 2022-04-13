program chislo3;
 var a1,a2,a3,d,a,k,S:integer;
 begin
 read(a);
 a1:=a div 100;
 a2:=a div 10 mod 10;
 a3:=a mod 10;
 S:=a1+a3;
 write(a2);
 write(S);
 end.