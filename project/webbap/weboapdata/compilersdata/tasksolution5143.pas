Program N1_13;
Var A,R1,R2,k,x:integer;

begin
     read(A);
     R1:=(A div 10) mod 10;
     k:=A div 100;
     x:=A mod 10;
     R2:=k+x;
     writeln(R1);
     writeln(R2);
end.

