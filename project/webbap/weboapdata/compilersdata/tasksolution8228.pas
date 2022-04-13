program prg10_7;
const k=100;
type numbs= set of 2..k;
var N:integer;
    M:numbs;
    i,j:integer;
    flag:boolean;

begin
     flag:=true;
     read(N);
     for i:=2 to N do
     begin
          for j:=2 to round(sqrt(i)) do
          begin
               if j<>i then
               begin
                    if (i mod j)=0 then
                    begin
                         flag := false;
                         break;
                    end
                       else flag:=true;

               end;

          end;
          if flag then
          begin
               M:=M+[i];
               flag:=true;
          end;
     end;

     for i:=2 to k do
         if i in M then write(i);
end.