program z12;
   var R1,R2,o,b,c,d:integer;
begin
   read(A);
   o:=A div 1000;
   b:= (A div 100) mod 10;
   c:=(A div 10) mod 10;
   d:= A mod 10;
   R1:= o+d;
   R2:= b+c;
   write(S1,' ',S2);
end.