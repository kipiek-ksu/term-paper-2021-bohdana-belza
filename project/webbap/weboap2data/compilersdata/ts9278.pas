Program Lab_10_119;


Type
    TChuild = record
       Surname: string;
       name: string;
       year: integer;
       sickness: string;
       vaccin: string;
       address: string;
    end;


    info = file of TChuild;


var
   n,i: integer;
   children: TChuild;
   inf: info;

procedure add( var inf: info);

var
   i: integer;
   Children: TChuild;
   begin
        
        readln(n);

        assign(inf);
        rewrite(inf);


        for i:= 1 to n do
        begin
             with children do
             begin
                 
                  read(surname);
                 
                  read(name);
                 
                  read(year);
                 
                  read(sickness);
                  
                  read(vaccin);
                 
                  read(address);
                  write;

             end;
             write(inf,children)
        end;

        close(inf)
   end;


procedure print( var inf: info);

var Children: TChuild;
begin
     assign(inf);
     reset(inf);

     while not (eof(inf)) do
     begin
     read(inf,Children);
     if (2007 - Children.year > 5) then
     begin
          with Children do
          begin
               write(surname);
               write(name);
               write(year);
               write(sickness);
               write(vaccin);
               write(address);
          end
     end
     end;
     close(inf)
end;


begin
     clrscr;
     add(inf);
     print(inf);

end.