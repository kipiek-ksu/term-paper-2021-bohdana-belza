
Program Evklid; 
var M, N: integer;
begin
     readln(M, N);
     while M<>N do
          begin
               if M>N 
               then M:=M-N 
               else N:=N-M
     end;
     write(М)
end.