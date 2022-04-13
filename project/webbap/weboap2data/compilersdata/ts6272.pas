Program pr13;
Var m, n, k:real;  t:integer;
begin
read(m,n);
t:=0;
    repeat 
        begin
           m:=m+(m*0.2);
           t:=t+1;
        end; 
   until m>n;
   if m>n then t=0;
writeln(t);
end.