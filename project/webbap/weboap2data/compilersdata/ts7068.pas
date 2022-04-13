Program zad4; 
Var 
   N, a: integer; 
Function f(n:integer):integer; 
Begin 
   If n =1 then 
      f :=1
   Else 
   Begin 
         n:= n div 2; 
         f:=f(n+2)-2*f(n+1) 
      end; 
end ; 
begin
   clrscr; 
   write(n); 
repeat
   readln(n); 
until n>0 and n<31;
   a:=f(n); 
   write(a); 
end.